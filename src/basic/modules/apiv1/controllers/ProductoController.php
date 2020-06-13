<?php

namespace app\modules\apiv1\controllers;

use yii\rest\ActiveController;

/**
 * Producto controller for the `apiv1` module
 */
class ProductoController extends ActiveController
{
    public $modelClass = 'app\modules\apiv1\models\Producto';
}
