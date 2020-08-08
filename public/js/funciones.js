async function agregarSesion(url,data){

    let result = await axios.post(url,data)
    return result;
    
}

async function agregarGeneral(url,data){
    let confirmacion = await confirmar("seguro quieres guardar esta cosa?")
    .then(async resp =>{
        if(resp === "ok"){
            let result = await axios.post(url,data)
            return result;
        }
        return false;
    })

    return confirmacion;
}

async function editarGeneral(url,data){

    let confirmacion = await confirmar()
    .then(async resp=>{        
        if(resp === "ok"){
            let result = await  axios.put(url,data)
            return result;                
        }
        return false;
    })

    return confirmacion
    
}


async function eliminarItemTbl(url){
    let confirmacion = await confirmar()
    .then(async resp=>{        
        if(resp === "ok"){
            let result = await  axios.delete(url)
            return result;                
        }
        return false;
    })
    return confirmacion
}

async function confirmar(texto="¿Esta seguro de realizar la operación?")
{
	let result = await swal({title: "Atención",text: texto,
		type: "info",
		buttons: {
	    cancel: "Cancelar",
	    ok: true,
	  },
		})
	return result;
}


function alertOk(texto="La operación fue realizada con éxito",header="OK"){
    swal(header, texto, "success");
}


function alertError(texto="Lo sentimos su operación no pudo ser realizada",header="ERROR"){
    swal(header, texto, "error");
}

//alert("aqui");
