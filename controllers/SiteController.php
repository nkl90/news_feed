<?php

namespace app\controllers;

use Faker\Provider\DateTime;
use Yii;
use app\models\Article;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $news = Article::find()
            ->where([ 'is_verified' => Article::IS_VERIFIED ])
            ->andWhere('public_dt <= "' . date('Y-m-d H:i:s') . '" OR public_dt IS NULL')
            ->orderBy('public_dt', 'DESC')
            ->orderBy('id', 'DESC');
        $countNews = clone $news;
        $pages = new Pagination(['totalCount' => $countNews->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $models = $news->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', [
            'items' => $models,
            'pages' => $pages
        ]);
    }

    public function actionNews($id)
    {
        if (($item = Article::findOne($id)) !== null) {
            //Считаем просмотры
            $item->view_count += 1;
            $item->save();
            return $this->render('show_news', ['item' => $item]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['article/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['article/index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAddNews()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {
            $model->added_dt = date('Y-m-d H:i:s');
            $model->save();
            return $this->render('add_news_complete');
        } else {
            return $this->render('add_news', [
                'model' => $model,
            ]);
        }
    }
}
