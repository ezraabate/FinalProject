<script type="text/javascript">
     
<?php foreach ($product as $key => $row): ?>


let carts = document.querySelectorAll('.add_cart');
     


for(let i=0 ; i< carts.length ; i++){

  carts[i].addEventListener('click', () =>{
     cartNumbers();
  });
}
function cartNumbers(){
  let productnumbers = localStorage.getItem('cart');
  productnumbers = parseInt(productnumbers);
    if(productnumbers)
    {
    
    localStorage.setItem('cart',productnumbers + 1);  
    }
    
    else
    {
    localStorage.setItem('cart',1);
    }
}  

</script>