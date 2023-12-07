from django.http import HttpResponseRedirect
from django.shortcuts import redirect, render
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from django.contrib.auth.models import User
from .forms import CustomUserCreationForm, CustomUserChangeForm, CustomePasswordChangeForm
from .models import CustomUser
# Create your views here.
def loggin(request):

  if request.method == "POST":
    username = request.POST['email']
    password = request.POST['password']
    user = authenticate(request, username=username, password=password)
    if user is not None:
      login(request, user)
      messages.success(request, 'Login successful')
      return redirect('home')
    else:
      messages.error(request, 'User or password inaccurate')
      return redirect('loggin')
  else:
    return render(request, 'blogger/login.html')


def register(request):
  form = CustomUserCreationForm()

  context = {
    'form': form
  }
  if request.method == 'POST':
      form = CustomUserCreationForm(request.POST, request.FILES)
      if form.is_valid():
        form.save()
        user = CustomUser.objects.get(email=request.POST['email'])
        user.set_password(request.POST['password'])
        user.save()
        messages.success(request, 'New User Created')
      return redirect('home')
  else:
    return render(request, 'blogger/register.html', context)


def loggout(request):
  logout(request)
  messages.success(request, 'Logout succefull')
  return redirect('home')


def update_profile(request, id=None):
  user = CustomUser.objects.get(id=id)
  form = CustomUserChangeForm(instance=user)

  context = {
    'form': form,
    'title': 'Update Profile'
  }
  if request.method == 'POST':
    form = CustomUserChangeForm(request.POST, request.FILES, instance=user)
    if form.is_valid():
      form.save()
      messages.success(request, 'Profile updated.')
      return HttpResponseRedirect(f'/blogger/user_profile/{request.user.id}')
    else:
      return render(request, 'blogger/update_profile.html', context)
  else:
    return render(request, 'blogger/update_profile.html', context)
  

def change_password(request, id=None):
  user = CustomUser.objects.get(id=id)
  form = CustomePasswordChangeForm(user)
  
  context = {
    'form': form,
      'title': 'Change Password'
  }
  if request.method == "POST":
    password = request.POST['new_password1']
    old_password = request.POST['old_password']
    new_password = request.POST['new_password2']
    print(password, old_password, new_password, user.password)
    if password == new_password:
      user.set_password(new_password)
      user.save()
      messages.success(request, 'Password changed')
      return redirect('home')
    else:
      messages.error(request, 'Password not changed')
      return render(request, 'blogger/update_profile.html', context)
  else:
    return render(request, 'blogger/update_profile.html', context)
  

def user_profile(request, id=None):
  user = request.user
  user = CustomUser.objects.get(id=id)

  context = {
    'user': user,
  }
  return render(request, 'blogger/user_profile.html', context)