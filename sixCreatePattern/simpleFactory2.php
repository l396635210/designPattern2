<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 2017/7/27
 * Time: 22:46
 */
/**
 *
 *
 *      简单工厂模式并不属于GoF 23个经典设计模式，但通常将它作为学习其他工厂模式的基础，它的设计思想很简单，其基本流程如下：
首先将需要创建的各种不同对象（例如各种不同的Chart对象）的相关代码封装到不同的类中，
 * 这些类称为具体产品类，而将它们公共的代码进行抽象和提取后封装在一个抽象产品类中，每一个具体产品类都是抽象产品类的子类；然后提供一个工厂类用于创建各种产品，在工厂类中提供一个创建产品的工厂方法，该方法可以根据所传入的参数不同创建不同的具体产品对象；客户端只需调用工厂类的工厂方法并传入相应的参数即可得到一个产品对象。
简单工厂模式定义如下：
简单工厂模式(Simple Factory Pattern)：定义一个工厂类，
 * 它可以根据参数的不同返回不同类的实例，被创建的实例通常都具有共同的父类。
 * 因为在简单工厂模式中用于创建实例的方法是静态(static)方法，因此简单工厂模式又被称为静态工厂方法(Static Factory Method)模式，它属于类创建型模式。
简单工厂模式的要点在于：当你需要什么，只需要传入一个正确的参数，就可以获取你所需要的对象，而无须知道其创建细节。简单工厂模式结构比较简单，其核心是工厂类的设计，其结构如下所示：
 *
 *
 *
 */
interface Product{

}
class concreateProductA implements Product{

}
class concreateProductB implements Product{

}
class Factory {
    function getObj($name){
        //这里可以做很多事情
        return new $name();
    }
}
/*
 *
       在简单工厂模式结构图中包含如下几个角色：
       ● Factory（工厂角色）：工厂角色即工厂类，它是简单工厂模式的核心，负责实现创建所有产品实例的内部逻辑；工厂类可以被外界直接调用，创建所需的产品对象；在工厂类中提供了静态的工厂方法factoryMethod()，它的返回类型为抽象产品类型Product。
       ● Product（抽象产品角色）：它是工厂类所创建的所有对象的父类，封装了各种产品对象的公有方法，它的引入将提高系统的灵活性，使得在工厂类中只需定义一个通用的工厂方法，因为所有创建的具体产品对象都是其子类对象。
       ● ConcreteProduct（具体产品角色）：它是简单工厂模式的创建目标，所有被创建的对象都充当这个角色的某个具体类的实例。每一个具体产品角色都继承了抽象产品角色，需要实现在抽象产品中声明的抽象方法。
       在简单工厂模式中，客户端通过工厂类来创建一个产品类的实例，而无须直接使用new关键字来创建对象，它是工厂模式家族中最简单的一员。
       在使用简单工厂模式时，首先需要对产品类进行重构，不能设计一个包罗万象的产品类，而需根据实际情况设计一个产品层次结构，将所有产品类公共的代码移至抽象产品类，并在抽象产品类中声明一些抽象方法，以供不同的具体产品类来实现，典型的抽象产品类代码如下所示：

*/

abstract class Product2 {
    //所有产品类的公共业务方法
public function methodSame() {
    //公共方法的实现
}

//声明抽象业务方法
public abstract  function methodDiff();
}
      // 在具体产品类中实现了抽象产品类中声明的抽象业务方法，不同的具体产品类可以提供不同的实现，典型的具体产品类代码如下所示：

class ConcreteProduct extends Product2{
    //实现业务方法
public function methodDiff() {
    //业务方法的实现
}
}
    //   简单工厂模式的核心是工厂类，在没有工厂类之前，客户端一般会使用new关键字来直接创建产品对象，而在引入工厂类之后，客户端可以通过工厂类来创建产品，在简单工厂模式中，工厂类提供了一个静态工厂方法供客户端使用，根据所传入的参数不同可以创建不同的产品对象，典型的工厂类代码如下所示：

class Factory2
{
    //静态工厂方法
    public static function getProduct($arg)
    {
        $product = null;
        if ($arg == "A") {
            $roduct = new ConcreteProductA();
            //初始化设置product
        } else if ($arg == "B") {
            $product = new ConcreteProductB();
            //初始化设置product
        }
        return $product;
    }
    // 在客户端代码中，我们通过调用工厂类的工厂方法即可得到产品对象，典型代码如下所示：
}

class Client
{
    public static function getClass($Factory) {
        $product = $Factory->getProduct("A"); //通过工厂类创建产品对象
        $product->methodSame();
        $product->methodDiff();
        }
}
