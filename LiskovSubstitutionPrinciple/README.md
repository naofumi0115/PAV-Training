# Liskov Substitution Principle :

The Liskov Substitution principle was introduced by Barbara Liskov in 1987.

>Subclass/Child class should be substitutable for their Superclass/parent class.

It states that any implementation of an abstraction (interface) should be 
substitutable in any place that the abstraction is accepted. Basically, 
it takes care that while coding using interfaces in our code, 
we not only have a contract of input that the interface receives but also the 
output returned by different Classes implementing that interface; they should be 
of the same type.

## Exercises

### Problem

Please look bad design at the following code :

```php
class VideoPlayer
{
    public function play($file)
    {
        // play the video
    }
}

class AviVideoPlayer extends VideoPlayer
{
    public function play($file)
    {
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'avi') {
            /*
                Violates LSP because:
                  - preconditions for the subclass can't be greater
                  - we can no longer substitute this behaviour anywhere else because the output could be different
             */
            throw new Exception;
        }
    }
}
```
If AviVideoPlayer have not avi extension, the code will throw exception.

### Solution

1. AviVideoPlayer should not substitutable for VideoPlayer so AviVideoPlayer should not extend from VideoPlayer.

```php
class AviVideoPlayer
{
    public function playAviVideo($file)
    {
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'avi') {
            throw new Exception;
        }
    }
}
```