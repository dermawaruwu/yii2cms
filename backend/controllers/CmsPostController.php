<?php

namespace backend\controllers;

use Yii;
use backend\models\CmsPost;
use backend\models\CmsPostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CmsCategory;
use backend\models\CmsTag;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * CmsPostController implements the CRUD actions for CmsPost model.
 */
class CmsPostController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout', 
                            'index', 
                            'view',
                            'create',
                            'update',
                            'delete',
                        ],
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
     * Lists all CmsPost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmsPostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmsPost model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CmsPost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsPost();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->post_id]);
        } else {
            $itemsCategory = $this->categoryDropdown();
            $itemsTag = $this->tagDropdown();
            return $this->render('create', [
                'model' => $model,
                'itemsCategory' => $itemsCategory,
                'itemsTag' => $itemsTag,
            ]);
        }
    }

     public function categoryDropdown(){
        $itemsCategory = ArrayHelper::map(CmsCategory::find()->where(['<>', 'category_id', 1])->all(), 'category_id', "category_title");
        return $itemsCategory;
    }

    public function tagDropdown(){
        $itemsTag = ArrayHelper::map(CmsTag::find()->all(), 'tag_id', 'tag_title');
        return $itemsTag;
    }

    /**
     * Updates an existing CmsPost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->post_id]);
        } else {
            $itemsCategory = $this->categoryDropdown();
            $itemsTag = $this->tagDropdown();
            return $this->render('update', [
                'model' => $model,
                'itemsCategory' => $itemsCategory,
                'itemsTag' => $itemsTag,
            ]);
        }
    }

    /**
     * Deletes an existing CmsPost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CmsPost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsPost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsPost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
