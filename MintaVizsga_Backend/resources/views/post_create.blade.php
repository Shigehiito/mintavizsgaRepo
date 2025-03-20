<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
<h1>Create Post</h1>
<form action='/post' method='POST'>
    @csrf
  <div class="mb-6">
    <label for="postTitle" class="form-label">Title</label>
    <input type="text" class="form-control" id="postTitle">
  </div>
  <div class="mb-6">
    <label for="postBody" class="form-label">Body</label>
    <textarea class="form-control" id="postBody"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
</body>
</html>