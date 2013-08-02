import pygame
from pygame.locals import*
import time, random, string, os
import subject, data

class Question(object):
    def __init__(self, game):
        self.game = game
        self.game.change_bg_color([0,64,0])
        self.questions=[]

        info = file(subject.get(), "r")
        part=0
        question = ""
        choices = []
        answer = ""
        while True:
            line = info.readline()
            if line=="\n":
                pass
            elif string.find(line, "END") != -1:
                break
            else:
                if part == 0:
                    question = line
                    question = string.replace(question, "[rtrn]", "\n")
                elif part == 1:
                    choices.append(line[:-1])
                elif part == 2:
                    choices.append(line[:-1])
                elif part == 3:
                    choices.append(line[:-1])
                elif part == 4:
                    choices.append(line[:-1])
                elif part == 5:
                    answer = line[:-1]
                    self.questions.append([question, choices, answer])

            part += 1
            if part >= 6:
                part = 0

        random.shuffle(self.questions, random.random)
        info.close()

        self.phase=0

        #all images
        self.question_board_image = pygame.image.load(data.filepath("title", "question_board.jpg"))

        self.scrolling_message=""
        self.scrolling_image=pygame.Surface([1,1])
        self.scrolling_time=300
        self.scrolling=self.scrolling_time


        #more random stuff
        self.set_question("Easy\n", [], " ")


