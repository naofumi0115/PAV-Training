# Testing

## Definition
A process of analyzing a software item to detect the differences between existing and required conditions (i.e., defects) and to evaluate the features of the software item, is called **Software Testing**.

In other words, Software testing is a process, to *evaluate* the *functionality of a software application* with an intent to find whether the developed software *met* the *specified requirements* or not and to identify the *defects* to ensure that the product is defect free in order to produce the *quality product*.

## Why need Testing
Nowaday, as per the current trend, due to constant change and development in digitization, our lives are improving in all areas. The way we work is also changed. We access our bank online, we do shopping online, we order food online and many more. We rely on software’s and systems. What if these systems turnout to be defective. We all know that one small bug shows huge impact on business in terms of financial loss and goodwill. This is an example proving how important testing is.

Below are 4 main reasons why testing becomes very significant:

1. **Cost effectiveness:** if the bugs can be identified in early stages of development then it costs much less to fix them

2. **Customer Satisfaction:** testing improves the user experience of an application and gives satisfaction to the customers

3. **Security:** if your product is not secured, hackers can gain unauthorized access to data, steal user information and use it for their benefit. It causes harm to our business, our customers. Testing helps in removing vulnerabilities in the product.

4. **Product Quality:** in any fields, a good product is goal that every company would like to gain.

## Testing Types

1. **Manual Testing:** is the process of testing software by hand to learn more about it, to find what is and isn’t working. This usually includes verifying all the features specified in requirements documents, but often also includes the testers trying the software with the perspective of their end user’s in mind. Manual test plans vary from fully scripted test cases, giving testers detailed steps and expected results, through to high-level guides that steer exploratory testing sessions.

2. **Automation Testing:** is the process of testing the software using an automation tool to find the defects. In this process, testers execute the test scripts and generate the test results automatically by using automation tools.

## Testing Approaches

1. **White Box Testing:** is also called as Glass Box, Clear Box, Structural Testing. White Box Testing is based on applications internal code structure. In white-box testing, an internal perspective of the system, as well as programming skills, are used to design test cases. This testing is usually done at the *unit* level.

2. **Black Box Testing:** is also called as Behavioral/Specification-Based/Input-Output Testing. Black Box Testing is a software testing method in which testers evaluate the functionality of the software under test without looking at the internal code structure.

3. **Grey Box Testing:** is the combination of both White Box and Black Box Testing. The tester who works on this type of testing needs to have access to design documents. This helps to create better test cases in this process.

## Testing Levels

1. **Unit Testing (UT):** is done to check whether the individual modules of the source code are working properly. i.e. testing each and every unit of the application separately by the developer in the developer’s environment.

2. **Integration Testing (IT):** is the process of testing the connectivity or data transfer between a couple of unit tested modules.

3. **System Testing (end to end testing):** is a black box testing. Testing the fully integrated application this is also called as end to end scenario testing. To ensure that the software works in all intended target systems. Verify thorough testing of every input in the application to check for desired outputs. Testing of the users experiences with the application. There are 2 types of system testing:

- **Functional testing:** in simple words, what the system actually does is functional testing. To verify that each function of the software application behaves as specified in the requirement document. Testing all the functionalities by providing appropriate input to verify whether the actual output is matching the expected output or not. It falls within the scope of black box testing and the testers need not concern about the source code of the application.

- **Non-functional testing:** in simple words, how well the system performs is non-functionality testing. Non-functional testing refers to various aspects of the software such as performance, load, stress, scalability, security, compatibility etc., Main focus is to improve the user experience on how fast the system responds to a request.

4. **Acceptance Testing:** To obtain customer sign-off so that software can be delivered and payments received. Types of Acceptance Testing are Alpha, Beta & Gamma Testing.

# PAV Testing
In PAV, although we are developers, we not only do coding but also testing. There are two main activities testing we alway do, they are UT and IT.

1. [UT](./UT.md)
2. [IT](./IT.md)