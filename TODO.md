### 📝 Future To-Do List: Image Logic Implementation

When you are ready to build the upload/update features, follow this checklist:

- [ ] **Update the HTML Form**
- Add `enctype="multipart/form-data"` to your `<form>` tag.
- Add a file input field: `<input type="file" name="image" accept="image/*">`.

- [ ] **Run Storage Link**
- Run `php artisan storage:link` in your terminal to link `storage/app/public` to `public/storage` so web browsers can load the images.

- [ ] **Implement Validation in Controller/FormRequest**
- Validate incoming images to ensure security and size control: `'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'`.

- [ ] **Handle File Storage on "Create" (Store)**
- Check if an image file exists in the request using `$request->hasFile('image')`.
- Store it using Laravel's storage: `$path = $request->file('image')->store('posts', 'public');`.
- Save the resulting `$path` string into the database.

- [ ] **Handle File Replacements on "Update"**
- If a user uploads a new image during an edit, delete the \*_old_- image file from disk first
  using `Storage::disk('public')->delete($post->image)` to prevent junk files from accumulating
  on your server.
- Save the new image path.

- [ ] **Handle Clean-Up on "Delete"**
- When a post is deleted, delete its associated image file from disk as well (either manually
- in the controller's `destroy` method or automatically via an Eloquent model `deleting` event).
