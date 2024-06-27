// TODO: Code your sticky nav-bar here
export const sticky = () => {
    window.addEventListener("scroll", function () {
        let navbar = document.getElementsByClassName("myheader");
        if (window.scrollY >= 70) {
            navbar[0].classList.add("sticky"); // Add the 'sticky' class
        } else {
            navbar[0].classList.remove("sticky"); // Remove the 'sticky' class
        }
    });
};
