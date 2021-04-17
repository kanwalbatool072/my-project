
export default(context) => {
    if (!context.app.store.state.auth.loggedIn == true) {
        // context.$router.push("/auth/login").catch(()=>{});
        return context.redirect('/auth/login');
    }
}