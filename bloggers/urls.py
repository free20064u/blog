from django.urls import path
from . import views

urlpatterns = [
    path('login/', views.loggin, name='loggin'),
    path('register/', views.register, name='register'),
    path('loggout/', views.loggout, name='loggout'),
    path('profile_update/<int:id>/', views.update_profile, name='update_profile'),
    path('change_password/<int:id>/', views.change_password, name='change_password'),
    path('user_profile/<int:id>/', views.user_profile, name='user_profile'),
]