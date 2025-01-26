const elements = document.querySelectorAll(".boxClick");
elements.forEach((element) => {
    element.addEventListener("click", (event) => {
        const { edit, url } = event.currentTarget.dataset;

        if (url) {
            console.log(`Redirecting to URL: ${url}`);
            window.location.href = url;
        } else {
            console.log(`URL is empty. Redirecting to Edit URL: ${edit}`);
            window.location.href = edit;
        }
    });
});
