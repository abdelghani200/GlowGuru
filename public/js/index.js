
function submitForm($id) {
    const input = document.querySelector("#product_id");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
    // console.log(12);
}


function deleteForm($id) {
    const input = document.querySelector("#delete_product_id");
    const form = document.querySelector("#delete_form");
    input.value = $id;
    form.submit();
}


document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btn").addEventListener("click", function (e) {
        e.preventDefault();
        let formAdd = document.querySelector(".form_add");
        let deleteBtn = document.createElement("BUTTON");
        // deleteBtn.classList.add("btn btn-danger");
        deleteBtn.setAttribute("class", "btn btn-danger mt-3");
        deleteBtn.innerHTML = "Delete";

        let formGroup = document.createElement("div");
        formGroup.classList.add("form-group", "mt-3");
        formGroup.setAttribute("id", "form_id mt-3");

        let inputTitle = document.createElement("input");
        inputTitle.setAttribute("type", "text");
        inputTitle.classList.add("form-control");
        inputTitle.setAttribute("name", "product_title[]");
        inputTitle.setAttribute("autocomplete", "off");
        inputTitle.setAttribute("placeholder", "Titre");
        formGroup.appendChild(inputTitle);

        let textArea = document.createElement("textarea");
        textArea.setAttribute("rows", "2");
        textArea.setAttribute("cols", "20");
        textArea.setAttribute("class", "mt-3");
        textArea.setAttribute("autocomplete", "off");
        textArea.classList.add("form-control");
        textArea.setAttribute("name", "product_description[]");
        textArea.setAttribute("placeholder", "Description");
        formGroup.appendChild(textArea);

        let inputPrice = document.createElement("input");
        inputPrice.setAttribute("type", "number");
        inputPrice.setAttribute("class", "mt-3");
        inputPrice.setAttribute("autocomplete", "off");
        inputPrice.classList.add("form-control");
        inputPrice.setAttribute("name", "product_price[]");
        inputPrice.setAttribute("placeholder", "Prix");
        formGroup.appendChild(inputPrice);

        let inputFile = document.createElement("input");
        inputFile.setAttribute("type", "file");
        inputFile.setAttribute("class", "mt-3");
        inputFile.setAttribute("multiple", "");
        inputFile.classList.add("form-control");
        inputFile.setAttribute("name", "image[]");
        formGroup.appendChild(inputFile);

        formGroup.appendChild(deleteBtn);
        formAdd.appendChild(formGroup);

        deleteBtn.addEventListener("click", function () {
            formGroup.remove();
        });
    });
});






const search = document.querySelector(".search");

const ProductName = document.getElementsByClassName("ProductName");
search.addEventListener("input", () => {
    Array.from(ProductName).forEach(ele => {
        // console.log(search.value);
        if (ele.innerText.includes(search.value)) {
            ele.parentElement.parentElement.parentElement.style.display = "block";
        }
        else {
            ele.parentElement.parentElement.parentElement.style.display = "none";
        }
    });
})
