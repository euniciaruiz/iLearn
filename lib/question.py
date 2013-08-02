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

	def set_question(self, question, choices, answer):
		self.question = question
        self.choices = choices
        self.answer = answer
		
		x = 0
        line = ""
        lines = []
        while x <= len(self.question):
            letter = self.question[x]
            if letter == "\n"or x == len(self.question)-1:
                image = self.game.font.render(line, True, [255,255,255])
                line = ""
                lines.append(image)
                if x == len(self.question)-1:
                    break
            else:
                line = line + letter
            x += 1;

    def update(self):
        if self.questions == []:
            ERROR("Out of questions!")

        if self.phase == 0:#new game
            for event in self.game.events:
              if event.type == KEYDOWN and event.key == K_SPACE:
                self.phase = 1
        elif self.phase == 1:#get ready
            self.game.change_bg_color([64,64,64])
            self.phase = 3
            self.set_question(self.questions[0][0], self.questions[0][1], self.questions[0][2])
        elif self.phase==3:#display question
            for event in self.game.events:
              if event.type == KEYDOWN and event.key == K_SPACE:
                self.phase = 1
                self.game.change_bg_color([0,0,0])
                self.questions.pop(0)
                self.set_question("\n", " ", " ")
            #self.set_question("Times up!\n\nThe answer is\n"+self.questions[0][2]+"\n", " ", " ")
            #self.next_music = self.music_loop
        elif self.phase == 4:#TIMES UP, shows answer
            self.questions.pop(0)
            self.phase = 0
            self.set_question("\n", " ", " ")
            self.game.change_bg_color([0,64,0])


    def set_scrolling_message(self, message):
        self.scrolling_message=message
        self.scrolling_image=self.game.font.render(message, True, [255,255,255])
        self.scrolling=0


    def render(self):
        rect = self.question_image.get_rect(center = [self.game.screen_size[0]/2,self.game.screen_size[1]/2])
        self.game.screen.blit(self.question_image, rect)
        self.game.rects.append(rect)
