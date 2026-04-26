import subprocess

allowed_commands = ["ls", "date", "whoami"]

cmd = input("Enter a command: ")

if cmd in allowed_commands:
    subprocess.run([cmd])
else:
    print("Command not allowed.")


