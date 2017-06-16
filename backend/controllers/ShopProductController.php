<?php

namespace backend\controllers;

use common\models\ar\ShopFaq;
use common\models\ar\ShopProductVariety;
use Yii;
use common\models\ar\ShopProduct;
use backend\models\search\ShopProductSearch;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShopProductController implements the CRUD actions for ShopProduct model.
 */
class ShopProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ShopProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopProduct model.
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
     * Creates a new ShopProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $faqList = ArrayHelper::map(ShopFaq::find()->select(['id', 'title'])->asArray()->all(), 'id', 'title');
        $model = new ShopProduct();

        $newVarieties = ArrayHelper::getValue(
            Yii::$app->request->post('newvariety', []), 'ShopProductVariety', []);
        $nvCnt = count($newVarieties);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ( $nvCnt ) {
                for($i = 0; $i < $nvCnt; $i++)
                    $newVarieties[$i] = new ShopProductVariety(['shop_product_id' => $model->id]);

                if ( Model::loadMultiple($newVarieties, Yii::$app->request->post('newvariety'))
                    && Model::validateMultiple($newVarieties) ) {
                    foreach ($newVarieties as $variety)
                        $variety->save(FALSE);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'faqList' => $faqList,
            'newVarieties' => $newVarieties
        ]);
    }

    /**
     * Updates an existing ShopProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $faqList = ArrayHelper::map(ShopFaq::find()->select(['id', 'title'])->asArray()->all(), 'id', 'title');
        $model = $this->findModel($id);

        $newVarieties = ArrayHelper::getValue(
            Yii::$app->request->post('newvariety', []), 'ShopProductVariety', []);
        $nvCnt = count($newVarieties);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $success = TRUE;
            if (Model::loadMultiple($model->varieties, Yii::$app->request->post())) {
                if ( Model::validateMultiple($model->varieties) ) {
                    $existed = Yii::$app->request->post('ShopProductVariety');
                    foreach ($model->varieties as $variety) {
                        if(isset($existed[$variety->id]))
                            $variety->save(false);
                        else
                            $variety->delete();
                    }
                } else {
                    $success = FALSE;
                }
            }

            if ( $nvCnt ) {
                for($i = 0; $i < $nvCnt; $i++)
                    $newVarieties[$i] = new ShopProductVariety(['shop_product_id' => $model->id]);

                if ( Model::loadMultiple($newVarieties, Yii::$app->request->post('newvariety'))
                    && Model::validateMultiple($newVarieties) ) {
                    foreach ($newVarieties as $variety)
                        $variety->save(FALSE);
                } else {
                    $success = FALSE;
                }
            }

            if ( $success )
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'faqList' => $faqList,
            'newVarieties' => $newVarieties
        ]);
    }

    /**
     * Deletes an existing ShopProduct model.
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
     * Finds the ShopProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopProduct::find()->where(['id' => $id])
                ->with(['varieties' => function ( $q ) {/* @var \yii\db\ActiveQuery $q */
                    $q->indexBy('id');
                }])
                ->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
