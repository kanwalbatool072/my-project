const endpoints = {
    name: "End Points",
    COMPANY: `maintain-company`,
    OFFICE: `maintain-office`,
    DEPARTMENT: `maintain-department`,
    CHART_OF_ACCOUNT_CATEGORY: `chart-account`,
    CHART_OF_ACCOUNT_CHILD_CATEGORY: `get-child-accounts/`
}
export default({
    app
}, inject) => {
    inject("URL", endpoints);
};
