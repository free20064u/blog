from django.contrib.auth.forms import UserCreationForm, UserChangeForm, PasswordChangeForm
from django.forms import ModelForm, TextInput, ImageField
from django import forms

from .models import CustomUser

class CustomUserCreationForm(ModelForm):
    password2 = forms.CharField(label='Password Confirm',
                                   widget=	forms.TextInput(
                                       attrs={'class':	'login_input', 'type': 'password'}))
   
    class Meta:
        model = CustomUser
        fields = ('username','email','password','password2', 'image')

        widgets = {
            'username':TextInput(attrs={
                'class':'login_input',
                'type':'text'
            }),
            'email':TextInput(attrs={
                'class':'login_input',
                'type':'email'
            }),
            'password':TextInput(attrs={
                'class':'login_input',
                'type':'password'
            })
        }


class CustomUserChangeForm(ModelForm):

    class Meta:
        model = CustomUser
        fields = ('first_name','last_name',"username", "email", 'image')


        widgets = {
             'first_name': TextInput(attrs={
                'class':'login_input menu_link'
            }),
             'last_name': TextInput(attrs={
                'class':'login_input menu_link'
            }),
            'username': TextInput(attrs={
                'class':'login_input menu_link'
            }),
            'email':TextInput(attrs={
                'class':'login_input menu_link'
            })
        }


class CustomePasswordChangeForm(PasswordChangeForm):

    old_password = forms.CharField(label='Old password',
                                   widget=	forms.TextInput(
                                       attrs={'class':	'login_input', 'type': 'password'}))
    
    new_password1 = forms.CharField(label='New password',
                                    widget=forms.TextInput(
                                        attrs={'class':	'login_input','type': 'password'}))
    
    new_password2 = forms.CharField(label='Password Confirm',
                                    widget=forms.TextInput(
                                        attrs={'class':	'login_input','type': 'password'}))
    class Meta:
        model = CustomUser
        fields = ('old_password')

       