<body>
<form action="{{route('news.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    title : <input type="text" name="title" id="">    
    description : <input type="text" name="description" id="">
    
    <input type="file" name="attachments[]" id="" multiple>
    
    <input type="submit" value="Submit">
</form>    
</body>