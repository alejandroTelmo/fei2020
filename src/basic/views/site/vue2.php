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
<div class="site-vue2">

<div id="app" class="container mt-3" >
<p :class="{'bg-danger':!es_info,'text-success':es_info}" >
Hello world (clase estatica)!!!
</p>
<p :class="[vari,yo]" >
Hello world  enlazado (array)!!!
</p>
<p :class="{'bg-warning':true,'text-primary':es_info}" >
Hello world  js condicional!!!
</p>
<button class="btn btn-warning" @click="es_info = !es_info"> Change </button>
<p>dsfasfa</p>
</div>

</div>
<script> 
var app = new Vue({
  el: '#app',
  data: {
  
    vari:'text-warning',
    yo:'bg-primary',
    es_info:true
   
  },
})




</script>
   

