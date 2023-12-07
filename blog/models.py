from django.db import models
from bloggers.models import CustomUser

# Create your models here.
class Post(models.Model):
	user = models.ForeignKey(CustomUser, on_delete=models.CASCADE)
	title = models.CharField(max_length=250)
	content = models.TextField()
	created = models.DateTimeField(auto_now_add=True)
	modified = models.DateTimeField(auto_now=True)

	def __str__(self):
		return self.title