<?php foreach ($todoList as $todo) { ?>
var checkbox <?php echo $todo['id'] ?> = document.getElementById("<?php echo $todo['id'] ?>");
var paragraph <?php echo $todo['id'] ?> = document.getElementById("p<?php echo $todo['id'] ?>");

checkbox <?php echo $todo['id'] ?>.addEventListener('change', function() {
    if (checkbox <?php echo $todo['id'] ?>.checked) {
        paragraph <?php echo $todo['id'] ?>.classList.add("line-through", "text-gray-400");
    } else {
        paragraph <?php echo $todo['id'] ?>.classList.remove("line-through", "text-gray-400");
    }
    localStorage.setItem("<?php echo $todo['id'] ?>", checkbox <?php echo $todo['id'] ?>.checked);
});

var isChecked <?php echo $todo['id'] ?> = localStorage.getItem("<?php echo $todo['id'] ?>");
if (isChecked <?php echo $todo['id'] ?> === 'true') {
    checkbox <?php echo $todo['id'] ?>.checked = true;
    paragraph <?php echo $todo['id'] ?>.classList.add("line-through", "text-gray-400");
}
<?php } ?>