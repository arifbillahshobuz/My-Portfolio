async function service(){
    try{
        const response = await axios.get('api/service');
        console.log(response);
    } catch(error){

    }
}
