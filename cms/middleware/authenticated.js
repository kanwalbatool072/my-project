export default (context) => {
    if (context.app.store.state.auth.loggedIn == true) {
        // context.$router.push("/admin").catch(()=>{});
        // return context.redirect('/admin');
    }
}
