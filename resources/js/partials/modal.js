// TODO: Code your modal here
export const modal = () => {
    const myModal = document.getElementById("staticBackdrop");
    myModal.addEventListener("show.bs.modal", async function (event) {
        const button = event.relatedTarget;
        const details = JSON.parse(button.dataset.bsDetails);
        const modalBody = document.getElementsByClassName("modal-body")[0];
        if (details.category !== "auth") {
            try {
                const response = await fetch(`${details.item._id}`);
                const { content } = await response.json();
                modalBody.innerHTML = content;
                const item = {
                    category: details.category,
                    info: details.item,
                };
                sessionStorage.setItem("item", JSON.stringify({ item }));
            } catch (error) {
                console.error("Error fetching modal content:", error);
            }
        } else {
            try {
                const response = await fetch("/auth");
                const { content } = await response.json();
                modalBody.innerHTML = content;
            } catch (error) {
                console.error("Error fetching modal content:", error);
            }
        }
    });
};
