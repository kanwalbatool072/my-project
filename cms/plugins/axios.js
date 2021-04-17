export default function({$axios,store,toast}) {
   
    $axios.onRequest(() =>{
        console.log('test');
    });
}