from django.urls import path
from . import views

urlpatterns = [
    path('', views.home , name='home' ),
    path('about/', views.about, name='about'),
    path('detail/<int:id>/', views.detail, name='detail'),
    path('new_post/', views.new_post , name='new_post'),
    path('update/<int:id>/', views.update, name='update'),
    path('delete/<int:id>/', views.delete, name='delete'),
]