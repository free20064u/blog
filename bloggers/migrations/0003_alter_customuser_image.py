# Generated by Django 4.2.7 on 2023-12-07 17:27

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('bloggers', '0002_customuser_image'),
    ]

    operations = [
        migrations.AlterField(
            model_name='customuser',
            name='image',
            field=models.ImageField(blank=True, default='default.jpg', upload_to='images'),
        ),
    ]
