<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Add new blog
    public function addBlogForm()
    {
        return view('blog.add-blog');
    }

    public function addNewBlog(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required|string:255',
            'description' => 'string',
            'tag' => 'string',
            'status' => 'string',
        ]);

        // ($var > 2 ? echo "greater" : echo "smaller")
        $formData['status'] = ($request->status == 'on') ? 'active' : 'draft';

        if ($request->hasFile('featured_image')) {
            $formData['featured_image'] = $request->file('featured_image')->store('images', 'public');
        }

        $formData['user_id'] = auth()->id();
        // dd($formData);
        Blog::create($formData);



        return redirect('/blog/add-new')->with('message', 'Your blog created successfully');
    }

    public function getAllBlogForUser()
    {
        return view('blog.blog-list', ['blogs' => Blog::all()->where('user_id', auth()->id())->sortDesc()]);
    }

    public function editBlogForm(Blog $blog)
    {
        return view('blog.edit-blog', ['blog' => $blog]);
    }

    public function updateBlog(Blog $blog, Request $request)
    {
        // Make sure logged in user is owner
        if ($blog->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formData = $request->validate([
            'title' => 'required|string:255',
            'description' => 'string',
            'tag' => 'string',
            'status' => 'string',
        ]);

        $formData['status'] = ($request->status == 'on') ? 'active' : 'draft';
        if ($request->hasFile('featured_image')) {
            $formData['featured_image'] = $request->file('featured_image')->store('images', 'public');
        }
        $formData['user_id'] = auth()->id();

        //update now
        $blog->update($formData);

        return back()->with('message', 'Blog updated successfully!');
    }

    // Delete Listing
    public function destroyABlog(Blog $blog)
    {
        // Make sure logged in user is owner
        if ($blog->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $blog->delete();
        return redirect('/blog')->with('message', 'Blog deleted successfully');
    }
}
