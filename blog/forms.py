from .models import Post
from django.forms import ModelForm, TextInput, Textarea, Select


class PostCreationForm(ModelForm):
    class Meta:
        model= Post
        fields = ['title', 'content']

        widgets = {
            'user': Select(attrs={
                'class': 'login_input'
            }),
            'title': TextInput(attrs={
                'class': 'login_input'
            }),
            'content': Textarea(attrs={
                'style':'width:100%'
            }),   
        }