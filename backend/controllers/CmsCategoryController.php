<?php

namespace backend\controllers;

use Yii;
use backend\models\CmsCategory;
use backend\models\CmsCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * CmsCategoryController implements the CRUD actions for CmsCategory model.
 */
class CmsCategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }
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
     * Lists all CmsCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmsCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;
        $itemsCategory = $this->categoryDropdown();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'itemsCategory' => $itemsCategory,
        ]);
    }

    public function categoryDropdown(){
        $itemsCategory = ArrayHelper::map(CmsCategory::find()->all(), 'category_id', "category_title");
        return $itemsCategory;
    }

    /**
     * Displays a single CmsCategory model.
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
     * Creates a new CmsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsCategory();

        $itemsCategory = $this->categoryDropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemsCategory' => $itemsCategory,
            ]);
        }
    }

    /**
     * Updates an existing CmsCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $itemsCategory = $this->categoryDropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'itemsCategory' => $itemsCategory,
            ]);
        }
    }

    /**
     * Deletes an existing CmsCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model["category_count"] < 1 ){
            $model->delete();
            Yii::$app->session->setFlash('success', 'You deleted a category');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'You can\'t delete that one because it has been used by some post');
            return $this->redirect(['index']);
        }
        
    }

    /**
     * Finds the CmsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CmsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
