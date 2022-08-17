import axios from "axios";

const name = document.querySelector("#name");
const price = document.querySelector("#price");
const description = document.querySelector("#description");
const title = document.querySelector("#title");

async function add() {
    try {
        const addNewProduct = await axios.post("/products/create", {
            product_name: name.value,
            price: price.value,
            description: description.value,
        });
        // window.location = "/index";
    } catch (error) {
        console.log(error);
    }
}

// document.addEventListener("submit", (event) => {
//     event.preventDefault();
// fetch()
// if (title == "Create") {
//     add();
// }
// });
