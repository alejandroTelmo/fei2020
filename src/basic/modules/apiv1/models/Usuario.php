<?php

namespace app\modules\apiv1\models;


class Usuario extends \app\models\Usuario
{
  public function fields()
  {
      return ['id','apellido','username'];
  }
}
