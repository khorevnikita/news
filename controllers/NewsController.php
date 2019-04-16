<?php

namespace app\controllers;

use app\models\News;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class NewsController extends Controller
{

    function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $news = News::find()->where(['activity' => 1])->all();
        return $this->render('list', ['news' => $news]);
    }

    public function actionCreate()
    {
        $news = new News();

        if (isset($_POST['News'])) {
            $news->attributes = $_POST['News'];

            $news->alias = $this->generateAlias($_POST['News']['name']);

            if ($news->save()) {
                $this->redirect([
                    "news/$news->id"
                ]);
            }
        }

        return $this->render('create', [
            'news' => $news
        ]);
    }

    protected function generateAlias($name)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',

            ' ' => '-',
        );
        return strtr($name, $converter);
    }

    public function actionView($alias)
    {
        $single_news = News::find()->where(['alias' => $alias])->one();
        if (!$single_news) {
            return $this->redirect('/news');
        }
        return $this->render('view', [
            'single_news' => $single_news
        ]);
    }

    public function actionEdit($alias)
    {
        $single_news = News::find()->where(['alias' => $alias])->one();
        if (!$single_news) {
            return $this->redirect('/news');
        }
        if (isset($_POST['News'])) {

            $single_news->attributes = $_POST['News'];
            $single_news->alias = $this->generateAlias($_POST['News']['name']);
            if ($single_news->save()) {
                $this->redirect([
                    "news/$single_news->alias"
                ]);
            }
        }
        $single_news->date = \Yii::$app->formatter->asDate($single_news->date);
        return $this->render('edit', [
            'single_news' => $single_news
        ]);
    }
}
