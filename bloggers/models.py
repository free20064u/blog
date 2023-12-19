from django.contrib.auth.models import AbstractUser
from django.db import models
from django.utils.translation import gettext as _

class CustomUser(AbstractUser):
    email = models.EmailField(_('email'), unique=True)
    image = models.ImageField(default='images/default.jpg', blank=True, upload_to='images')


    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ('username',)


    def __str__(self):
        return self.username


