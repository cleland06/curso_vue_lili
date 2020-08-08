<template>
	<div>
		<button  :disabled="clickeo" class="btn btn-block btn-primary btn-lg" >

			<span v-if="clickeo"> <i class="fa fa-circle-o-notch fa-spin"></i> Espere...</span>
			<div v-else>
				<span v-if="texto"><i class="fa fa-save"></i> {{texto}}</span>
				<span v-else ><i class="fa fa-save"> </i>Aceptar</span>
			</div>			
		</button>
	</div>
</template>
<script>
export default {
	props:{
		'clickeo':{
			default:false,
			type:Boolean
		},
		'texto':null
	}
}
</script>