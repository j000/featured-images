# featured-images
Adds a field to upload image to Rainlab Blog Category


Install the **RainLab.Pages plugin**
```
 First you have to make sure you have added the RainLab.Pages plugin to your project.
 Then add the J000.Featuredimages plugin.
 Now you'll find a file field when you add or edit a static page.
```

# OLD INFO BELOW!

## How to use it in a blog post or category page

To view your featured images you find them by adding **.featured_images** to your category-object, just like you would on your featured_images. As an example:

```twig
{% for category in post.categories %} {# loop blog post.categories #}
    {% if category.featured_images.count %} {# check to see if your category have any images #}
        {% for image in category.featured_images %} {# loop category.featured_images display images #}
            <img src="{{ image.path }}" alt="{{ image.file_name }}" />
        {% endfor %}
    {% endif %}
{% endfor %}
```

## That's all, folks!
