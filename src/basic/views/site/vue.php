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
<div class="site-vue">

<div id="app">

<button @click="mostrar = !mostrar">{{mostrar?'Ocultar':'Mostrar'}}</button> <p v-if="mostrar">Texto a ocultar</p>
</div>

<div id="app1">
<table class="table" id="productos">

    <th scope="col" id="nombre">Nombre</th><th scope="col"id="descripcion">Descripción</th><th scope="col" id="precio">Precio</th><th scope="col" id="cantidad">Cantidad</th><th scope="col" id="agregar">Agregar</th>

    <tr v-for="producto in productos"><td>{{producto.nombre}} </td><td>{{producto.descripcion}} </td><td>{{producto.precio}} </td><td><input v-model="producto.cantidad"> </td> <td><button v-on:click="producto.cantidad++">+</button><button v-on:click="producto.cantidad--">-</button></td></tr>

      <input v-model="nuevoNombre" @keyup.enter="fNombre" ref="productoNombre" placeholder="nombre" >

      <input v-model="nuevaDescripcion" @keyup.enter="fDescripcion" ref="productoDescripcion" placeholder="descripcion" >

      <input v-model.number="nuevoPrecio"@keyup.enter="fPrecio" ref="productoPrecio" placeholder="precio" >

      <input v-model.number="nuevaCantidad"ref="productoCantidad" @keyup.enter="agregarProducto" placeholder="cantidad" >

      <button v-on:click="agregarProducto">mas</button>


</table>
<span>El total de todos los precios es : {{totalProductos}} </span><hr>
     
  <input v-model="napellido" placeholder="ingrese su apellido"><p>Hola {{mio}}, esperamos tu consulta ! </p>
  <input v-model.number="nedad" @keyup.enter="mas" placeholder="ingrese su edad"><p v-if="edad > 20 && edad < 30">Estas hecho un pibe {{mio}}, esperamos tu consulta ! </p>
  <button @click="mas">+</button>
  <ul v-for="cliente in clientes">
  <li> Hola {{cliente.apellido}}</li><span>Edad : {{cliente.edad}} </span><span>Corregir edad </span><span> <button v-on:click="cliente.edad++">+</button><button v-on:click="cliente.edad--">-</button> </span>

  </ul>
  La edad total de los clientes es : {{totalEdad}}
</div>


<script> 
var app = new Vue({
  el: '#app',
  data: {
  
    hint:'texto a ocultar',
    mostrar:false,
   
  },
})



var app1 = new Vue({
  el: '#app1',
  data: {
    nuevoNombre:'',
    nuevaDescripcion:'',
    nuevoPrecio:0,
    nuevaCantidad:0,

    mio:'',
    nedad:0,
    napellido:'',
    clientes:[
            {apellido:"telmo",edad:42},
            {apellido:"sepulveda",edad:39}
    ],
    productos:[
      {nombre:'Medias', descripcion:'Medias 3/4',precio:120 ,cantidad:0},
      {nombre:'Pantalon', descripcion:'Jean elastizado',precio:135,cantidad:0},
      {nombre:'Camisa', descripcion:'Cuadrille',precio:155,cantidad:0 },
      {nombre:'Remera', descripcion:'M/larga',precio:189 ,cantidad:0}
    ]
  }, methods: {
    agregarProducto(){
      this.productos.push(
        {
        nombre: this.nuevoNombre,
        descripcion: this.nuevaDescripcion,
        precio: this.nuevoPrecio,
        cantidad: this.nuevaCantidad
     
        }
      )
      this.nuevoNombre='',
      this.nuevaDescripcion='',
      this.nuevoPrecio=0,
      this.nuevaCantidad=0,
      this.$refs.productoNombre.focus()
  },fNombre(){
   
      this.$refs.productoDescripcion.focus()
    
  }
  ,fDescripcion(){
   
   this.$refs.productoPrecio.focus(),
   this.$refs.productoPrecio.select()
}
,fPrecio(){
   
   this.$refs.productoCantidad.focus(),
   this.$refs.productoCantidad.select()
}
 , mas(){
    this.clientes.push(
      {
        apellido:this.napellido,
      edad:this.nedad
      }
      
    )
    this.napellido='',
    this.nedad=0
  }
  }
,computed:{
    totalEdad(){
      total=0
      for(cliente of this.clientes){
        total+=cliente.edad;
      }
      return total;
    },
    totalProductos(){
      totales=0
      for(producto of this.productos){
        totales+=producto.precio;
      }
      return totales;
    }
  }
})
</script>
   
</div>
