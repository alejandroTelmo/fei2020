<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Vue';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("https://cdn.jsdelivr.net/npm/vue/dist/vue.js",[
    'position'=>View::POS_HEAD
]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About vue.
    </p>
<div id="app">
  {{ message }}
</div>
<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hola Vue!'
  }
})
</script>
   
</div>
