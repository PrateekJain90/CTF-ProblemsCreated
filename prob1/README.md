#CTF Problem 1

###*Skill level*
Beginner/Intermediate

###*UPDATE:*
The previous proposal was to write arbitrary data to an arbitary location using format string exploit. Changed the 
problem to make it better.

###*Learning Objective:* 
The problem is to use format string vulnerability to get a shell, but instead of overwriting a return address on the stack, 
an entry in the GOT table has to be overwritten to get the shell code executed.

Checks like a random canary or a terminator canary can be placed, to see if the return address is 
being modified to prevent a regular buffer overflow attack. By overwriting a GOT entry, the stack 
guard or stack canary check will be bypassed.

So a question can be framed like:

John, a new developer hired by Deadelus Corp. has written a code that merely greets a user. It takes 
a name and then just prints it like "Hello, name". John is trying to be cautious and has used a random 
canary to prevent buffer overflow exploits. But, he made a simple mistake while printing the greeting 
message. Can you find a way to get a shell?


*Hint:* As you might have figured out that this question has a format string vulnerability, overwriting a 
GOT entry might be useful.


###*Resources*
1. https://crypto.stanford.edu/cs155/papers/formatstring-1.2.pdf
2. http://www.cis.syr.edu/~wedu/Teaching/cis643/LectureNotes_New/Format_String.pdf
3. http://phrack.org/issues/56/5.html
