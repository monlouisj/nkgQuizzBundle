# nkgQuizzBundle

Simply publish and administrate quizzes within your Sonata application.

<br/>
<h3>How to install :</h3>

1 - install bundle via packagist

2 - install dependencies : run *composer update*

3 - install database : run *php app/console doctrine:schema:update --force*

4 - import routes (they are defined in Annotation) in your routing.yml
```
app:
    resource: "@NkgQuizzBundle/Controller/"
    type:     annotation
```

5 - add this entity manager to your config.yml :
```
NkgQuizzBundle: ~
```

<h3>Services classes</h3>

Nkg\QuizzBundle\Services
