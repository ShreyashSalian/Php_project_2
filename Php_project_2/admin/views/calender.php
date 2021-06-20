<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="date" id="date-picker">
    <script>
        let date = new Date();
        let year = date.getFullYear();
        let month = date.getMonth();
        let todaydate = String(date.getDate()).padStart(2,'0');
        var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        let datePattern = year + '-' + month + '-'+ todaydate + '-' + hours + '-' + '-' + minutes + '-' + seconds; 
        alert(datePattern);
        document.getElementById('#date-picker').value = datePattern;
        document.write(datePattern);
       
    </script>
</body>
</html>