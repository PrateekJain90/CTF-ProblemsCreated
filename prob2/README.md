#CTF Problem 2

###*Problem Area*
Cryptography

###*Skill level*
Beginner/Intermediate

###*Prerequisites*
Cipher Block Chaining (Encryption/Decryption)

###*Concept being taught*
This problem gives an introduction to **CBC Bit-Flipping attacks**.

The aim of such an attack is to change the ciphertext in such a way that it results in a predictable change in the plaintext. The attack has nothing to do with the cipher, but works against a particular message or a series of messages.

One of the most common scenarios in which such an attack can be used is to elevate privileges of a normal user to admin.


###*Storyline*
We have found a URL that lets a user login and presents the user with a message. We believe that an administrator, when logged in, can see some secret information which is otherwise not shown to normal users. Can you help us login with administrator privileges?

*Hint:* Modifying the cookie might help.

###*Walkthrough*
A user will be made to login to a web service where he will be shown his current role. The roles may be assigned based on a combination of user id and a group id (These id's are visible to the user). Once logged in, a cookie is also assigned to the user.

This cookie encrypts userid and groupid along with other things.
Whenever a subsequent request is sent from the user to the service, the cookie will be decrypted, the user id and group id are checked, and a general message is displayed to the user.

The task then is to modify the value of this encrypted cookie, and send requests to the service so that when decrypted, the user and the group id turn out to be that of an administrator. In this case, the service will display the flag instead of a general message.

###*Resources*

1. http://resources.infosecinstitute.com/cbc-byte-flipping-attack-101-approach/
2. http://en.wikipedia.org/wiki/Bit-flipping_attack
