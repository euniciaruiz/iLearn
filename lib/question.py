import pygame
from pygame.locals import*
import time, random, string, os
import subject, data

class Question(object):

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
