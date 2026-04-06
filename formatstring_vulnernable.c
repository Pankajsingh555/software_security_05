#include <stdio.h>
int main() {
    char input[100];

    printf("Enter format string: ");
        fgets(input, sizeof(input), stdin);
    printf(input); 
    return 0;
}

/* Input	What it does (The Vulnerability)
Hello %x %x	Reads and prints data from the Stack in hex.
%p %p %p %p	Dumps Memory Addresses (pointers) from the stack.
%100d	Forces printf to output 100 spaces (controlling width).
%s	Can cause a Crash if it tries to read a non-existent string pointer.
%n	Writes the number of characters printed so far into a memory address (can lead to remote code execution).*/
