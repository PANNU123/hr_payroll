import React from "react";
import MainLayout from "../../Layout/Mainlayout";
function Index() {
    return <div>Index</div>;
}

Index.layout = (page) => <MainLayout children={page} />;

export default Index;
