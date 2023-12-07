from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from django.core.paginator import Paginator
from .models import Post
from .forms import PostCreationForm

# Create your views here.

def home(request):
	posts = Post.objects.all().order_by('-modified')
	paginator = Paginator(posts, 5)
	page_number = request.GET.get('page')
	page_obj = paginator.get_page(page_number)
	
	context = {
		'posts': page_obj,
	}
	return render( request, 'blog/index.html', context)


def about(request):
	return render(request, 'blog/about.html')


def detail(request, id=None):

	post = get_object_or_404(Post, id=id)
	context = {
		'post': post,
	}

	return render(request, 'blog/detail.html', context)

@login_required
def new_post(request):
	form = PostCreationForm()
	context = {
		'form': form,
	}

	if request.method == "POST":
		form = PostCreationForm(request.POST)
		if form.is_valid():
			new_form = form.save(commit=False)
			new_form.user = request.user
			new_form.save()
			messages.success(request, 'Post succesfully created')
			return redirect('home')
		else:
			messages.error(request, "Form was invalid. Post wasnt created")
			return render(request, 'blog/new_post.html', context)
	else:
		return render(request, 'blog/new_post.html', context)
	

@login_required
def update(request, id=None):
	post = Post.objects.get(id=id)
	form = PostCreationForm(instance=post)
	context = {
		'form': form,
	}
	if request.method == "POST":
		form = PostCreationForm(request.POST, instance=post)
		if form.is_valid():
			form.save()
			messages.success(request, 'Post successfully updated')
			return redirect('home')
		else:
			messages.error(request, "Post was not updated")
			return render(request, 'blog/new_post.html', context)	
	else:
		return render(request, 'blog/new_post.html', context)

@login_required
def delete(request):
	Post.objects.get(id=id).delete()
	messages.success(request, "Post successfully deleted")
	return redirect('home')