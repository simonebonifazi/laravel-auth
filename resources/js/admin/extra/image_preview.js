const url = "https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg";
const preview = document.getElementById('preview');
const imageArea = document.getElementById('image');
imageArea.addEventListener('input', ()=>{

   preview.src = url || imageArea.value;
})
