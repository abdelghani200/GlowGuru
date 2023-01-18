
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


const search = document.querySelector(".search");

const ProductName = document.getElementsByClassName("ProductName");
search.addEventListener("input",()=>{
    Array.from(ProductName).forEach(ele =>{
    // console.log(search.value);
    if(ele.innerText.includes(search.value)){
        ele.parentElement.parentElement.style.display = "flex";
    }
    else{
        ele.parentElement.parentElement.style.display = "none";
    }
   });
})
